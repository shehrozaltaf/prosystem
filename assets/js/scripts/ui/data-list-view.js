/*=========================================================================================
    File Name: data-list-view.js
    Description: List View
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function() {
  "use strict";


  // To append actions dropdown before add new button
  var actionDropdown = $(".actions-dropodown");
  actionDropdown.insertBefore($(".top .actions .dt-buttons"));


  // Scrollbar
  if ($(".data-items").length > 0) {
    new PerfectScrollbar(".data-items", { wheelPropagation: false })
  }

  // Close sidebar
  $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
    $(".add-new-data").removeClass("show");
    $(".overlay-bg").removeClass("show");
  });

  // On Edit
  $('.action-edit').on("click",function(e){
    e.stopPropagation();
    $(".add-new-data").addClass("show");
    $(".overlay-bg").addClass("show");
  });

  // mac chrome checkbox fix
  if (navigator.userAgent.indexOf("Mac OS X") != -1) {
    $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
  }
});