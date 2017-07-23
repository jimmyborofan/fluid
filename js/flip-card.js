$(function(){
     /* $("#card-1").flip({
        axis: "y", // y or x
        reverse: false, // true and false
        trigger: "hover", // click or hover
        speed: '250',
        front: $('.other-front'),
        back: $('.other-back'),
        autoSize: false
      });
	  */
      $("#card-2").flip({
        axis: "x",
        reverse: true,
        trigger: "click"
      });
    });