/**
 * @author rroche
 */
var dLoad = {
	/**
	 * 
	 * @param {Object} func
	 * a function to trigger when the DOM is fully loaded
	 */
    loaded: function(func){
        var oonload = window.onload;
        if (typeof window.onload != 'function') {
            window.onload = func;
        }
        else {
            window.onload = function(){
                if (oonload) {
                    oonload();
                }
                func();
            }
        }
    }
}