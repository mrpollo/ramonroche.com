/**
 * @author rroche
 */
var eCal = {
	eventWidth: 600,
	dayEvents: null,
	totalHours: 12,
    /**
     Lays out events for a single  day
     
     @param array  events
     An array of event objects. Each event object consists of a start time, end
     Time (measured in minutes) from 9am, as well as a unique id. The
     Start and end time of each event will be [0, 720]. The start time will
     Be less than the end time.  The array is not sorted.
     
     @return array
     An array of event objects that has the width, the left and top positions set,
     In addition to start time, end time, and id.
     
     **/
    layOutDay: function(events){
		for(var m in events){
			// set the height of the event
			events[m].height = (events[m].end-events[m].start);
			// detect collision with other events
			collision = this.collisionDetection(events[m].start, events[m].height, events[m].id, events);
			// store collisions that are relevant
			// to this event
			var cs = [];
			for(var nn in collision){
				if(collision[nn].inw != m){
					if(collision[nn].result){
						cs.push(collision[nn].inw);
					}
				}
			}
			events[m].colliders = cs;
			// set the position of the events on stage
			if(events[m].colliders.length > 0){
				var colls = events[m].colliders;
				var option = colls.length;
				var nWidth = 0;
				
				for(var n in colls){
					var moveCounter = 0;
					// if width is not previously set its because from
					// the time that this starts and back there is no 
					// colliding event, this means the width will be
					// equal to the full stage 600px
					if(events[m].width === undefined){
						nWidth = this.eventWidth / (option + 1);
						events[m].width = nWidth;
					}else{
						nWidth = events[m].width;
					}
					// if there is a colliding event
					// we make the collider events have the width we want them to have
					// and we know if they move because they would have to be on the left of the stack
					if (colls[n] > m) {
						events[colls[n]].width = nWidth;
						events[colls[n]].move = true;
						moveCounter++;
					}else{
						events[colls[n]].move = false;
					}
					// if the event has to move and it has a left never wset
					// we make the position of the event relative to the 
					// division of the width versus the number of collisions plus 1
					if(events[colls[n]].move){
						if(colls[n] > m){
							if(events[colls[n]].left === undefined){
								if(events[m].left === undefined){
									events[colls[n]].left = nWidth*(Number(n)+1);
								}
								
							}
						}
					}
				}
			}
		}
		this.dayEvents = events;
		this.printLayout(events);
    },
	/**
	 * 
	 * @param {Object} start
	 * start position of the element to check against
	 * @param {Object} height
	 * the total height of the element to check against
	 * @param {Object} id
	 * the unique identifier in the array of the element to check against
	 * @param {Object} where
	 * the stack to which the element belongs and want to check for collisions
	 * @return {Object} result
	 * returns the same stack but with updated data of collisions
	 */
	collisionDetection: function(start, height, id, where){
		var result = [];
		for(var m in where){
			var res = false;
			if(start > where[m].start && start < where[m].end){
				res = true;
			}else{
				res = false;
			}
			var comb = start+height;
			if(comb > where[m].start && start < where[m].end){
				res = true;
			}else{
				res = false;
			}
			result.push({result:res,inw:m });
		}
		return result;
	},
    /**
     *
     * @param {array} event
     * An array that provides the info for the layout to be print
     * @return {void}
     */
    printLayout: function(events){
	
		/*
		 * Clear Canvas First
		 */
		eCal.clearCanvas();
	
		/*
		 * for future reference if no events are passed try to grab the class day events
		 * still needs to fix cross browser problems there
		 */	
		var dayHolder = document.getElementById('cal-area');
		
		if(events == null && this.dayEvents != null){
			console.log(typeof events+' '+typeof this.dayEvents);
			events = this.dayEvents;
		}
		for(var m in events){
			// event
			var cal_event = document.createElement('div');
			cal_event.setAttribute('id','sample_item_'+events[m].id);
			cal_event.setAttribute('class','cal-event');
				// change styles
				// here we would ideally get the styles of the top and bottom padding and border to rest from the height to match the exact time
				// instead i set this as a fixed value for timing reasons
				// same for width
				// var cal_styles_height = Number(cal_event.style.borderTopWidth - cal_event.style.borderBottomWidth - cal_event.style.paddingTop - cal_event.style.paddingTop);
				var cal_styles_height = 22;
				var cal_styles_width = 24;
				cal_event.style.height = (events[m].height-cal_styles_height)+'px';
				cal_event.style.marginTop = events[m].start+'px';
				if(events[m].width !== 0){
					cal_event.style.width = (events[m].width-cal_styles_width)+'px';
				}
				if (events[m].left !== 0) {
					cal_event.style.marginLeft = events[m].left+'px';
				}
			// title
			var event_title  = document.createElement('div');
			event_title.setAttribute('class','event-title');
			event_title.innerHTML = 'Sample Item '+m;
			// location
			var event_location = document.createElement('div');
			event_location.setAttribute('class','event-location');
			event_location.innerHTML = 'Sample Location';
			// append into event
			cal_event.appendChild(event_title);
			cal_event.appendChild(event_location);
			// append into day
			dayHolder.appendChild(cal_event);
		}
    },
	/**
	 * Print the Hours of the Day in the canvas
	 */
	printHours: function(){
		/*
		<div class="info-top" id="900">
            9:00
            <div class="info-text">
                AM
            </div>
        </div>
		*/
		var cal_info = document.getElementById('cal-info');
		for(var i=0;i<this.totalHours;i++){
			var info_top = document.createElement('div');
			var info_text = document.createElement('div');
			info_top.setAttribute('class','info-top');
			info_top.setAttribute('id',9+i);
			info_top.innerHTML = 9+i;
			info_text.setAttribute('class','info-text');
			if(i<3){
				info_text.innerHTML='AM';
			}else{
				info_text.innerHTML='PM';
			}
			info_top.appendChild(info_text);
			cal_info.appendChild(info_top);
		}
	},
	/**
	 * Clear the Canvas
	 */
	clearCanvas: function(){
		document.getElementById('cal-area').innerHTML = "";
	}
}