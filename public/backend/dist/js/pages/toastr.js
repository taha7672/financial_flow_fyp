/*
Template Name: Material Pro admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";
      $(".tst1").click(function(){
           $.toast({
            heading: 'Welcome to Material Pro admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg:'#94a19f',
            icon: 'info',
            hideAfter: 3000, 
            stack: 6
          });

     });
     // loaderBg:'#ff6849',     default color  was 
      $(".tst2").click(function(){
           $.toast({
            heading: 'Welcome to Material Pro admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg:'#94a19f',
            icon: 'warning',
            hideAfter: 3500, 
            stack: 6
          });

     });
          // show toaser when message is success or error
   
          $(".tst3").click(function(){
       

           $.toast({
            heading: Success  ,
            text: message,
            position: 'top-right',
            loaderBg:'#94a19f',
            icon: 'success',
            hideAfter: 3500, 
            stack: 6
          });
     
});


      $(".tst4").click(function(){
           $.toast({
            heading: 'Welcome to Material Pro admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg:'##94a19f',
            icon: 'error',
            hideAfter: 3500
            
          });

     });
});
          
