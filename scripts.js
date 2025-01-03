// Move Icon Div to top level
jQuery(document).ready(function() {
  jQuery(".help-info .patient-info .pp-flipbox .pp-icon-wrapper").prependTo(".help-info .patient-info .pp-flipbox-container");
  jQuery(".help-info .care-info .pp-flipbox .pp-icon-wrapper").prependTo(".help-info .care-info .pp-flipbox-container");
  jQuery(".help-info .health-info .pp-flipbox .pp-icon-wrapper").prependTo(".help-info .health-info .pp-flipbox-container");
});


// Change Hover into Click
jQuery(document).ready(function() {
  var clickDelay = null;

  // Attach hover event handler to the specified element
  jQuery('#home-hover.call-today .pp-tabs .pp-tabs-label').hover(function() {
    // Set a delay before simulating a click event
    clickDelay = setTimeout(function() {
      jQuery(this).click();
    }.bind(this), 200); // Adjust the delay time (in milliseconds) as needed
  }, function() {
    // Clear the click delay if user moves away from the element
    clearTimeout(clickDelay);
  });
});


//Add button to process section
jQuery(document).ready(function() {
    // Find the last .pp-tabs-label inside .call-today .pp-tabs
    var lastLabel = jQuery(".call-today .pp-tabs #pp-tab-j0zs6gn89pc5-3");
    
    // Create the new div element
    var newDiv = jQuery('<div><a class="fl-button" href="/contact-us/">Talk with our friendly staff</a></div>');
    
    // Append the new div after the last .pp-tabs-label
    lastLabel.after(newDiv);
});


//Add class to slider item
jQuery(document).ready(function() {
  // Select the elements you want to add classes to
  var elements = jQuery(".slider-case .pp-card-slider-container .pp-card-slider-item");

  // Loop through each element and add a class based on its index
  elements.each(function(index) {
    // The class to be added (cs-one, cs-two, cs-three, etc.)
    var className = "cs-" + (index + 1);

    // Add the class to the current element
    jQuery(this).addClass(className);
  });
});


//Move title div above image
jQuery(document).ready(function() {
  // Check if the screen width is above 992px using media query
  if (window.matchMedia("(min-width: 992px)").matches) {
    // Your existing code here
    jQuery(".slider-case .pp-card-slider-container .pp-card-slider-item.cs-1 .pp-card-slider-title").prependTo(".slider-case .pp-card-slider-container .pp-card-slider-item.cs-1");
    jQuery(".slider-case .pp-card-slider-container .pp-card-slider-item.cs-2 .pp-card-slider-title").prependTo(".slider-case .pp-card-slider-container .pp-card-slider-item.cs-2");
    jQuery(".slider-case .pp-card-slider-container .pp-card-slider-item.cs-3 .pp-card-slider-title").prependTo(".slider-case .pp-card-slider-container .pp-card-slider-item.cs-3");
    jQuery(".slider-case .pp-card-slider-container .pp-card-slider-item.cs-4 .pp-card-slider-title").prependTo(".slider-case .pp-card-slider-container .pp-card-slider-item.cs-4");
  }
});


//Add class when option selected
jQuery(document).ready(function() {
  // Get the select element
  var selectElement = document.querySelector("#input_5_8");

  // Get the div element to add the class to
  var divElement = document.querySelector("#gform_5");

  // Check if both elements exist before adding an event listener
  if (selectElement && divElement) {
    selectElement.addEventListener("change", function () {
      // Check if any option other than the default ("Select Option") is selected
      if (selectElement.value !== "") {
        // Add the "selection-active" class to the div element
        divElement.classList.add("selection-active");
      } else {
        // Remove the "selection-active" class if the default option is selected
        divElement.classList.remove("selection-active");
      }
    });
  }
});




