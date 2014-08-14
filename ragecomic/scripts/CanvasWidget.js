var CanvasWidget = Base.extend({
    canvas: null,
    context: null,
    position: null,
    widgetListeners: null,
    constructor: function (canvasElementID, position) {
        this.canvas = document.getElementById(canvasElementID);
        this.context = this.canvas.getContext('2d');
        this.drawWidget();
        this.initMouseListeners();
        this.position = position;
        this.widgetListeners = new Array();
    },
    initMouseListeners: function () {
        this.mouseMoveTrigger = new Function();
        if (document.all) {
            this.canvas.attachEvent("onmousedown", this.mouseDownActionPerformed.bindAsEventListener(this));
            this.canvas.attachEvent("onmousemove", this.mouseMoveActionPerformed.bindAsEventListener(this));
            this.canvas.attachEvent("onmouseup", this.mouseUpActionPerformed.bindAsEventListener(this));
            this.canvas.attachEvent("onmouseout", this.mouseUpActionPerformed.bindAsEventListener(this));
        } else {
            this.canvas.addEventListener("mousedown", this.mouseDownActionPerformed.bindAsEventListener(this), false);
            this.canvas.addEventListener("mousemove", this.mouseMoveActionPerformed.bindAsEventListener(this), false);
            this.canvas.addEventListener("mouseup", this.mouseUpActionPerformed.bindAsEventListener(this), false);
            this.canvas.addEventListener("mouseout", this.mouseUpActionPerformed.bindAsEventListener(this), false);
        }
    },
    mouseDownActionPerformed: function (e) {
        this.mouseMoveTrigger = function (e) {
            this.checkWidgetEvent(e);
        }
        this.checkWidgetEvent(e);
    },
    mouseMoveActionPerformed: function (e) {
        this.mouseMoveTrigger(e);
    },
    mouseUpActionPerformed: function (e) {
        this.mouseMoveTrigger = new Function();
    },
    checkWidgetMouseEvent: function (e) {},
    drawWidget: function () {},
    addWidgetListener: function (eventListener) {
        this.widgetListeners[this.widgetListeners.length] = eventListener;
    },
    callWidgetListeners: function () {
        if (this.widgetListeners.length != 0) {
            for (var i = 0; i < this.widgetListeners.length; i++)
            this.widgetListeners[i]();
        }
    },
    getCanvasMousePos: function (e) {
        return {
            x: e.clientX - this.position.x + $(window).scrollLeft(),
            y: e.clientY - this.position.y + $(window).scrollTop()
        };
    }
});
var CanvasHelper = {
    canvasExists: function (canvasName) {
        var canvas = document.getElementById(canvasName);
        return canvas.getContext('2d');
    }
}