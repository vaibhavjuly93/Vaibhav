//### Form
/** 
 * This function defines the URL to the page created etc.
 * See http://api.drupal.org/api/function/hook_menu/6
 */
function my_module_menu() {
  $items = array();
  $items['my_module/form'] = array(
    'title' => 'My form',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_module_my_form'),
    'access arguments' => array('access content'),
    'description' => 'My form',
    'type' => MENU_CALLBACK,
  );
  return $items;
}


/**
 * This function gets called in the browser address bar for: 
 * "http://yourhost/my_module/form" or 
 * "http://yourhost/?q=my_module/form". It will generate
 * a page with this form on it.
 * This function is called the "form builder". It builds the form.
 */
function my_module_my_form($form, &$form_state) {
	
	// This is the first form element. It's a textfield with a label, "Name"
  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Name'),
  );
  return $form;
}


//### Form With Submit Button
<?php

function my_module_menu() {
  $items = array();
  $items['my_module/form'] = array(
    'title' => t('My form'),
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_module_my_form'),
    'access arguments' => array('access content'),
    'description' => t('My form'),
    'type' => MENU_CALLBACK,
  );
  return $items;
}

function my_module_my_form($form_state) {
  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Name'),
  );
  
  // Adds a simple submit button that refreshes the form and clears its contents -- this is the default behavior for forms.
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Submit',
  );
  return $form;
}
?>


//### form with fieldset 
<?php

function my_module_menu() {
  $items = array();
  $items['my_module/form'] = array(
    'title' => t('My form'),
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_module_my_form'),
    'access arguments' => array('access content'),
    'description' => t('My form'),
    'type' => MENU_CALLBACK,
  );
  return $items;
}

function my_module_my_form($form_state) {
	
  // We establish a fieldset element and then place two text fields within
  // it, one for a first name and one for a last name. This helps us group 
  //related content.
  //
  // Study the code below and you'll notice that we renamed the array of the first
  // and last name fields by placing them under the $form['name'] 
  // array. This tells
  // Form API these fields belong to the $form['name'] fieldset.
  $form['name'] = array(
    '#type' => 'fieldset',
    '#title' => t('Name'),
  );
  $form['name']['first'] = array(
    '#type' => 'textfield',
    '#title' => t('First name'),
  );
  $form['name']['last'] = array(
    '#type' => 'textfield',
    '#title' => t('Last name'),
  );
  
  
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Submit',
  );
  return $form;
}
?>

//### form with fieldset & validation
<?php

function my_module_menu() {
  $items = array();
  $items['my_module/form'] = array(
    'title' => t('My form'),
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_module_my_form'),
    'access arguments' => array('access content'),
    'description' => t('My form'),
    'type' => MENU_CALLBACK,
  );
  return $items;
}

function my_module_my_form($form, &$form_state)
	
	// To make the fieldset collapsible
  $form['name'] = array(
    '#type' => 'fieldset',
    '#title' => t('Name'),
    '#collapsible' => TRUE, // Added
    '#collapsed' => FALSE,  // Added
  );
  
  // To make these fields required
  $form['name']['first'] = array(
    '#type' => 'textfield',
    '#title' => t('First name'),
    '#required' => TRUE, // Added
  );
  $form['name']['last'] = array(
    '#type' => 'textfield',
    '#title' => t('Last name'),
    '#required' => TRUE, // Added
  );
  
  
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Submit',
  );
  return $form;
}
?>

//### form with addition element attribute
<?php

function my_module_menu() {
  $items = array();
  $items['my_module/form'] = array(
    'title' => t('My form'),
    'page callback' => 'my_module_form',
    'access arguments' => array('access content'),
    'description' => t('My form'),
    'type' => MENU_CALLBACK,
  );
  return $items;
}

function my_module_form() {
  return drupal_get_form('my_module_my_form');
}

function my_module_my_form($form_state) {
  $form['name'] = array(
    '#type' => 'fieldset',
    '#title' => t('Name'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  
  // This demonstrates additional attributes of text form fields.
  //
  // For a very useful example of how other form fields work, see
  // http&#58;//api.drupal.org/api/file/developer/topics/forms_api.html
  //
  // For a complete listing of all form fields and their attributes, see
  // http&#58;//api.drupal.org/api/file/developer/topics/forms_api_reference.html
  $form['name']['first'] = array(
    '#type' => 'textfield',
    '#title' => t('First name'),
    '#required' => TRUE,
    '#default_value' => "First name", // added
    '#description' => "Please enter your first name.", // added
    '#size' => 20, // added
    '#maxlength' => 20, // added
  );
  $form['name']['last'] = array(
    '#type' => 'textfield',
    '#title' => t('Last name'),
    '#required' => TRUE,
  ); 
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Submit',
  );
  return $form;
}
?>

//### form with validate handler

function my_module_menu() {
  $items = array();
  $items['my_module/form'] = array(
    'title' => t('My form'),
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_module_my_form'),
    'access arguments' => array('access content'),
    'description' => t('My form'),
    'type' => MENU_CALLBACK,
  );
  return $items;
}

function my_module_my_form($form, &$form_state) {
  $form['name'] = array(
    '#type' => 'fieldset',
    '#title' => t('Name'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['name']['first'] = array(
    '#type' => 'textfield',
    '#title' => t('First name'),
    '#required' => TRUE,
    '#default_value' => "First name",
    '#description' => "Please enter your first name.",
    '#size' => 20,
    '#maxlength' => 20,
  );
  $form['name']['last'] = array(
    '#type' => 'textfield',
    '#title' => t('Last name'),
    '#required' => TRUE,
  );
  
  // New form field added to permit entry of year of birth.
  // The data entered into this field will be validated with
  // the default validation function.
  $form['year_of_birth'] = array(
    '#type' => 'textfield',
    '#title' => "Year of birth",
    '#description' => 'Format is "YYYY"',
  ); 
  
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Submit',
  );
  return $form;
}

// This adds a handler/function to validate the data entered into the 
// "year of birth" field to make sure it's between the values of 1900 
// and 2000. If not, it displays an error. The value report is // $form_state['values'] (see http://drupal.org/node/144132#form-state).
//
// Notice the name of the function. It is simply the name of the form 
// followed by '_validate'. This is the default validation function.
function my_module_my_form_validate($form, &$form_state) {
  $year_of_birth = $form_state['values']['year_of_birth'];
  if ($year_of_birth && ($year_of_birth < 1900 || $year_of_birth > 2000)) {
    form_set_error('year_of_birth', 'Enter a year between 1900 and 2000.');
  }
}

//### form with submit handler
<?php

function my_module_menu() {
  $items = array();
  $items['my_module/form'] = array(
    'title' => t('My form'),
    'page callback' => 'drupal_get_form',
    'page arguments' => array('my_module_my_form'),
    'access arguments' => array('access content'),
    'description' => t('My form'),
    'type' => MENU_CALLBACK,
  );
  return $items;
}

/**
 * Returns the render array for the form.
 */
function my_module_my_form($form, &$form_state) {
  $form['name'] = array(
    '#type' => 'fieldset',
    '#title' => t('Name'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['name']['first'] = array(
    '#type' => 'textfield',
    '#title' => t('First name'),
    '#required' => TRUE,
    '#default_value' => "First name",
    '#description' => "Please enter your first name.",
    '#size' => 20,
    '#maxlength' => 20,
  );
  $form['name']['last'] = array(
    '#type' => 'textfield',
    '#title' => t('Last name'),
    '#required' => TRUE,
  );
  $form['year_of_birth'] = array(
    '#type' => 'textfield',
    '#title' => t('Year of birth'),
    '#description' => 'Format is "YYYY"',
  );  
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Submit',
  );
  return $form;
}
/**
 * Validates the form.
 */
function my_module_my_form_validate($form, &$form_state) {
	$year_of_birth = $form_state['values']['year_of_birth'];
	if ($year_of_birth && ($year_of_birth < 1900 || $year_of_birth > 2000)) {
		form_set_error('year_of_birth', t('Enter a year between 1900 and 2000.'));
	}
}

/**
 * Add a submit handler/function to the form.
 *
 * This will add a completion message to the screen when the
 * form successfully processes
 */
function my_module_my_form_submit($form, &$form_state) {
	drupal_set_message(t('The form has been submitted.'));
}
?>



//### Form with button & validation
<?php

function my_module_menu() {
  $items = array();
  $items['my_module/form'] = array(
    'title' => t('My form'),
    'page callback' => 'my_module_form',
    'access arguments' => array('access content'),
    'description' => t('My form'),
    'type' => MENU_CALLBACK,
  );
  return $items;
}

function my_module_form() {
  return drupal_get_form('my_module_my_form');
}

function my_module_my_form($form_state) {
  $form['name'] = array(
    '#type' => 'fieldset',
    '#title' => t('Name'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  
  // Removes the #required property and 
  // uses the validation function instead.
  $form['name']['first'] = array(
    '#type' => 'textfield',
    '#title' => t('First name'),
    '#default_value' => "First name",
    '#description' => "Please enter your first name.",
    '#size' => 20,
    '#maxlength' => 20,
  );
  
  // Removes the #required property and 
  // uses the validation function instead.
  $form['name']['last'] = array(
    '#type' => 'textfield',
    '#title' => t('Last name'),
  );
  $form['year_of_birth'] = array(
    '#type' => 'textfield',
    '#title' => "Year of birth",
    '#description' => 'Format is "YYYY"',
  );  
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Submit',
  );
  // Adds a new button to clear the form. The #validate property
  // directs the form to use a new validation handler function in place
  // of the default.
  $form['clear'] = array(
    '#type' => 'submit',
    '#value' => 'Reset form',
    '#validate' => array('my_module_my_form_clear'),
  );
  
  return $form;
}

// This is the new validation handler for our Reset button. Setting
// the $form_state['rebuild'] value to TRUE, clears the form and also
// skips the submit handler.
function my_module_my_form_clear($form, &$form_state) {
	$form_state['rebuild'] = TRUE;
}

// Provides the first and last name fields to be required by using the 
// validation function to make sure values have been entered. This 
// causes the name fields to show up in red if left blank after clearing 
// the form with the "Reset form" button.
function my_module_my_form_validate($form, &$form_state) {
	$year_of_birth = $form_state['values']['year_of_birth'];
	$first_name = $form_state['values']['first'];
	$last_name = $form_state['values']['last'];
	if (!$first_name) {
		form_set_error('first', 'Please enter your first name.');
	}
	if (!$last_name) {
		form_set_error('last', 'Please enter your last name.');
	}
	if ($year_of_birth && ($year_of_birth < 1900 || $year_of_birth > 2000)) {
		form_set_error('year_of_birth', 'Enter a year between 1900 and 2000.');
	}
}

function my_module_my_form_submit($form, &$form_state) {
	drupal_set_message(t('The form has been submitted.'));
}
?>


//### form with button & state change
<?php

function my_module_menu() {
  $items = array();
  $items['my_module/form'] = array(
    'title' => t('My form'),
    'page callback' => 'my_module_form',
    'access arguments' => array('access content'),
    'description' => t('My form'),
    'type' => MENU_CALLBACK,
  );
  return $items;
}

function my_module_form() {
  return drupal_get_form('my_module_my_form');
}

function my_module_my_form($form, $form_state) {
  $form['name'] = array(
    '#type' => 'fieldset',
    '#title' => t('Name'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );

 // Change/add the #default_value for the first name, last name, and
// birth year to show their old values so when the "Add another name"
//button is clicked, they will retain their values.
  $form['name']['first'] = array(
    '#type' => 'textfield',
    '#title' => t('First name'),
  //  '#default_value' => $form_state['values']['first'], // changed  // replaced
    '#default_value' => (isset($form_state['values']['first'])) ? $form_state['values']['first'] : 'First Name',
    '#description' => "Please enter your first name.",
    '#size' => 20,
    '#maxlength' => 20,
  );
  $form['name']['last'] = array(
    '#type' => 'textfield',
    '#title' => t('Last name'),
  //  '#default_value' => $form_state['values']['last'], // added  // replaced
    '#default_value' => (isset($form_state['values']['last'])) ? $form_state['values']['last'] : 'Last Name',
  );
  $form['year_of_birth'] = array(
    '#type' => 'textfield',
    '#title' => "Year of birth",
    '#description' => 'Format is "YYYY"',
  //  '#default_value' => $form_state['values']['year_of_birth'], // added  // replaced
    '#default_value' => (isset($form_state['values']['year_of_birth'])) ? $form_state['values']['year_of_birth'] : 'Year of Birth',  // replacement
  );

  // Add another elements to the form
  if (isset($form_state['storage']['another_name'])) { // This value is set after
                                                   // "Add another name" button
                                                   // is clicked.
      $form['name2'] = array(
        '#type' => 'fieldset',
        '#title' => t('Name #2'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
      );
      $form['name2']['first2'] = array(
        '#type' => 'textfield',
        '#title' => t('First name'),
        '#description' => "Please enter your first name.",
        '#size' => 20,
        '#maxlength' => 20,
   //     '#default_value' => $form_state['values']['first2'],  // replaced
        '#default_value' => (isset($form_state['values']['first2'])) ? $form_state['values']['first2'] : 'First Name',
      );
      $form['name2']['last2'] = array(
        '#type' => 'textfield',
        '#title' => t('Last name'),
   //     '#default_value' => $form_state['values']['last2'],  // replaced
        '#default_value' => (isset($form_state['values']['last2'])) ? $form_state['values']['last2'] : 'Last Name',
      );
      $form['year_of_birth2'] = array(
        '#type' => 'textfield',
        '#title' => "Year of birth",
        '#description' => 'Format is "YYYY"',
    //     '#default_value' => $form_state['values']['year_of_birth2'],  // replaced
        '#default_value' => (isset($form_state['values']['year_of_birth2'])) ? $form_state['values']['year_of_birth2'] : 'Year of Birth',
      );
    }
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Submit',
  );
  $form['clear'] = array(
    '#type' => 'submit',
    '#value' => 'Reset form',
    '#validate' => array('my_module_my_form_clear'),
  );

  // Adds "Add another name" button, if it hasn't already been clicked.
  if (empty($form_state['storage']['another_name'])) {  // This value is set
                                                    // after "Add another name"
                                                    // button is clicked.
      $form['another_name'] = array(
        '#type' => 'submit',
        '#value' => 'Add another name',
        '#validate' => array('my_module_my_form_another_name'),
      );
    }

  return $form;
}

//Creating a new element, 'another_name' in the $form_state['storage'] array
// sets the value used to determine whether to show the new
// fields on the form and hide the "Add another name" button.
function my_module_my_form_another_name($form, &$form_state) {
    $form_state['storage']['another_name'] = TRUE;
    $form_state['rebuild'] = TRUE; // Calling this explicitly will cause the
                                   // default submit function to be skipped
                                   // and the form to be rebuilt.
}

function my_module_my_form_clear($form, $form_state) {  // changed because 
                                                        // second parameter
                                                        // causes fault
                                                        // when by value, even
                                                        // though it seems more
                                                        // correct
    unset ($form_state['values']);  // ensures fields are blank after reset
                                    // button is clicked
    unset ($form_state['storage']); // ensures the reset button removes the
                                    // another_name part

    $form_state['rebuild'] = TRUE; // Calling this explicitly will cause the
                                   // default submit function to be skipped
                                   // and the form to be rebuilt.
}

// Adds logic to validate the form to check the validity of the new fields,
// if they exist.
function my_module_my_form_validate($form, &$form_state) {
    $year_of_birth = $form_state['values']['year_of_birth'];
    $first_name = $form_state['values']['first'];
    $last_name = $form_state['values']['last'];
    if (!$first_name) {
        form_set_error('first', 'Please enter your first name.');
    }
    if (!$last_name) {
        form_set_error('last', 'Please enter your last name.');
    }
    if ($year_of_birth && ($year_of_birth < 1900 || $year_of_birth > 2000)) {
        form_set_error('year_of_birth', 'Enter a year between 1900 and 2000.');
    }
    if (isset($form_state['storage']['another_name'])) { // This value is set after
                                                   // "Add another name" button
                                                   // is clicked.    // added
        if ($form_state['storage']['another_name']) {
            $year_of_birth = $form_state['values']['year_of_birth2'];
            $first_name = $form_state['values']['first2'];
			$last_name = $form_state['values']['last2'];
			if (!$first_name) {
				form_set_error('first2', 'Please enter your first name.');
			}
			if (!$last_name) {
				form_set_error('last2', 'Please enter your last name.');
			}
			if ($year_of_birth && ($year_of_birth < 1900 || $year_of_birth > 2000)) {
				form_set_error('year_of_birth2', 'Enter a year between 1900 and 2000.');
			}
        }
    }  // added
}

// Commenting out the line with the unset() function and
// then adding a new set of name fields and submitting the form,
// causes the form to no longer clear itself. The reason is that when
// the 'storage' value is set, the $form_state['rebuild'] value will get
// set to true  causing the form fields to get rebuilt with the
// values found in $form_state['values'].
function my_module_my_form_submit($form, &$form_state) {
    unset($form_state['storage']);
    drupal_set_message(t('The form has been submitted.'));
}
?>


//### form with multi part

function my_module_menu() {
  $items['my_module/form'] = array(
    'title' => t('My form'),
    'page callback' => 'my_module_form',
    'access arguments' => array('access content'),
    'description' => t('My form'),
    'type' => MENU_CALLBACK,
  );
  return $items;
}
function my_module_form() {
  return drupal_get_form('my_module_my_form');
}
// Adds logic to our form builder to give it two pages. It checks a
// value in $form_state['storage'] to determine if it should display page 2.
function my_module_my_form($form, $form_state) {
  // Display page 2 if $form_state['storage']['page_two'] is set
  if (isset($form_state['storage']['page_two'])) {
    return my_module_my_form_page_two();
  }
  // Page 1 is displayed if $form_state['storage']['page_two'] is not set
  $form['name'] = array(
    '#type' => 'fieldset',
    '#title' => t('Name'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['name']['first'] = array(
    '#type' => 'textfield',
    '#title' => t('First name'),
  //  '#default_value' => $form_state['values']['first'], // changed  // replaced
    '#default_value' => (isset($form_state['values']['first'])) ? $form_state['values']['first'] : 'First Name',  // replacement
    '#description' => "Please enter your first name.",
    '#size' => 20,
    '#maxlength' => 20,
  );
  $form['name']['last'] = array(
    '#type' => 'textfield',
    '#title' => t('Last name'),
  //  '#default_value' => $form_state['values']['last'], // changed  // replaced
    '#default_value' => (isset($form_state['values']['last'])) ? $form_state['values']['last'] : 'Last Name',  // replacement
  );
  $form['year_of_birth'] = array(
    '#type' => 'textfield',
    '#title' => "Year of birth",
    '#description' => 'Format is "YYYY"',
  //  '#default_value' => $form_state['values']['year_of_birth'], // changed  // replaced
    '#default_value' => (isset($form_state['values']['year_of_birth'])) ? $form_state['values']['year_of_birth'] : 'Year of Birth',  // replacement
  );
  // Add new elements to the form
  if (!empty($form_state['storage']['another_name'])) {
    $form['name2'] = array(
      '#type' => 'fieldset',
      '#title' => t('Name #2'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    );
    $form['name2']['first2'] = array(
      '#type' => 'textfield',
      '#title' => t('First name'),
      '#description' => "Please enter your first name.",
      '#size' => 20,
      '#maxlength' => 20,
  //  '#default_value' => $form_state['values']['first2'], // changed  // replaced
    '#default_value' => (isset($form_state['values']['first2'])) ? $form_state['values']['first2'] : 'First Name',  // replacement
    );
    $form['name2']['last2'] = array(
      '#type' => 'textfield',
      '#title' => t('Last name'),
  //  '#default_value' => $form_state['values']['last'], // changed  // replaced
    '#default_value' => (isset($form_state['values']['last2'])) ? $form_state['values']['last2'] : 'Last Name',  // replacement
    );
    $form['year_of_birth2'] = array(
      '#type' => 'textfield',
      '#title' => "Year of birth",
      '#description' => 'Format is "YYYY"',
  //  '#default_value' => $form_state['values']['year_of_birth2'], // changed  // replaced
    '#default_value' => (isset($form_state['values']['year_of_birth2'])) ? $form_state['values']['year_of_birth2'] : 'Year of Birth',  // replacement
    );
  }
  $form['clear'] = array(
    '#type' => 'submit',
    '#value' => 'Reset form',
    '#validate' => array('my_module_my_form_clear'),
  );
  if (empty($form_state['storage']['another_name'])) {
    $form['another_name'] = array(
      '#type' => 'submit',
      '#value' => 'Add another name',
      '#validate' => array('my_module_my_form_another_name'),
    );
  }
  $form['next'] = array(
    '#type' => 'submit',
    '#value' => 'Next >>',
  );
  return $form;
}
// New function created to help make the code more manageable
function my_module_my_form_page_two() {
  $form['color'] = array(
    '#type' => 'textfield',
    '#title' => 'Favorite color',
  );
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Submit',
  );
  return $form;
}
function my_module_my_form_another_name($form, &$form_state) {
  $form_state['storage']['another_name'] = TRUE;
  $form_state['rebuild'] = TRUE; // Will cause the default submit function
                                 // to be skipped.
}
function my_module_my_form_clear($form, $form_state) {  // changed because 
                                                        // second parameter
                                                        // causes fault
                                                        // when by value, even
                                                        // though it seems more
                                                        // correct
  unset ($form_state['values']);  // ensures fields are blank after reset
                                  // button is clicked
  unset ($form_state['storage']); // ensures the reset button removes the
                                  // another_name part
  $form_state['rebuild'] = TRUE;
}
// Modifies function so it can validate page 2
function my_module_my_form_validate($form, &$form_state) {
  // Validate page 2 here
  if (isset($form_state['storage']['page_two'])) {
    $color = $form_state['values']['color'];
    if (!$color) {
      form_set_error('color', 'Please enter a color.');
    }
    return;
  }
  $year_of_birth = $form_state['values']['year_of_birth'];
  $first_name = $form_state['values']['first'];
  $last_name = $form_state['values']['last'];
  if (!$first_name) {
    form_set_error('first', 'Please enter your first name.');
  }
  if (!$last_name) {
    form_set_error('last', 'Please enter your last name.');
  }
  if ($year_of_birth && ($year_of_birth < 1900 || $year_of_birth > 2000)) {
    form_set_error('year_of_birth', 'Enter a year between 1900 and 2000.');
  }
  if (isset($form_state['storage']['another_name'])) { // This value is set after
                                                   // "Add another name" button
                                                   // is clicked.    // added
	  if ($form_state['storage']['another_name']) {
		$year_of_birth = $form_state['values']['year_of_birth2'];
		$first_name = $form_state['values']['first2'];
		$last_name = $form_state['values']['last2'];
		if (!$first_name) {
		  form_set_error('first2', 'Please enter your first name.');
		}
		if (!$last_name) {
		  form_set_error('last2', 'Please enter your last name.');
		}
		if ($year_of_birth && ($year_of_birth < 1900 || $year_of_birth > 2000)) {
		  form_set_error('year_of_birth2', 'Enter a year between 1900 and 2000.');
		}
	}
  }
}
// Modifies this function so that it will respond appropriately based on
// which page was submitted. If the first page is being submitted,
// values in the 'storage' array are saved and the form gets
// automatically reloaded.
// If page 2 was submitted, we display a message and redirect the
// user to another page.
function my_module_my_form_submit($form, &$form_state) {
  // Handle page 1 submissions
  if ($form_state['clicked_button']['#id'] == 'edit-next') {
    $form_state['storage']['page_two'] = TRUE; // We set this to determine
                                               // which elements to display
                                               // when the page reloads.
    // Values below in the $form_state['storage'] array are saved
    // to carry forward to subsequent pages in the form.
    $form_state['storage']['page_one_values'] = $form_state['values'];
    $form_state["rebuild"] = TRUE;   // Added
  }
  // Handle page 2 submissions
  else {
    /*
     Normally, some code would go here to alter the database with the data
     collected from the form. Sets a message with drupal_set_message()
     to validate working code.
     */
    drupal_set_message('Your form has been submitted');
    unset ($form_state['storage']); // This value must be unset for
                                    // redirection! This is because
                                    // $form_state['rebuild'] gets set to TRUE
                                    // when 'storage' is set. See code sample
                                    // #9 for more on this.
    $form_state['redirect'] = 'node'; // Redirects the user.
  }
}
