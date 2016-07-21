    <?php
    /**
    * @file
    * Examples demonstrating the Drupal Form API.
    */https://api.drupal.org/api/examples/form_example!form_example.module/group/form_example/7.x-1.x
    /**
    * @defgroup form_example Example: Form API
    * @ingroup examples
    * @{
    * Examples demonstrating the Drupal Form API.
    *
    * The Form Example module is a part of the Examples for Developers Project
    * and provides various Drupal Form API Examples. You can download and
    * experiment with this code at the
    * @link http://drupal.org/project/examples Examples for Developers project page. @endlink
    */
    /**
    * Implements hook_menu().
    *
    * Here we set up the URLs (menu entries) for the
    * form examples. Note that most of the menu items
    * have page callbacks and page arguments set, with
    * page arguments set to be functions in external files.
    */
    function form_example_menu() {
    $items = array();
    $items['examples/form_example'] = array(
    'title' => 'Form Example',
    'page callback' => 'form_example_intro',
    'access callback' => TRUE,
    'expanded' => TRUE,
    );
    $items['examples/form_example/tutorial'] = array(
    'title' => 'Form Tutorial',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_1'),
    'access callback' => TRUE,
    'description' => 'A set of ten tutorials',
    'file' => 'form_example_tutorial.inc',
    'type' => MENU_NORMAL_ITEM,
    );
    $items['examples/form_example/tutorial/1'] = array(
    'title' => '#1',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_1'),
    'access callback' => TRUE,
    'description' => 'Tutorial 1: Simplest form',
    'type' => MENU_DEFAULT_LOCAL_TASK,
    'file' => 'form_example_tutorial.inc',
    );
    $items['examples/form_example/tutorial/2'] = array(
    'title' => '#2',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_2'),
    'access callback' => TRUE,
    'description' => 'Tutorial 2: Form with a submit button',
    'type' => MENU_LOCAL_TASK,
    'file' => 'form_example_tutorial.inc',
    );
    $items['examples/form_example/tutorial/3'] = array(
    'title' => '#3',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_3'),
    'access callback' => TRUE,
    'description' => 'Tutorial 3: Fieldsets',
    'type' => MENU_LOCAL_TASK,
    'file' => 'form_example_tutorial.inc',
    );
    $items['examples/form_example/tutorial/4'] = array(
    'title' => '#4',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_4'),
    'access callback' => TRUE,
    'description' => 'Tutorial 4: Required fields',
    'type' => MENU_LOCAL_TASK,
    'file' => 'form_example_tutorial.inc',
    );
    $items['examples/form_example/tutorial/5'] = array(
    'title' => '#5',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_5'),
    'access callback' => TRUE,
    'description' => 'Tutorial 5: More element attributes',
    'type' => MENU_LOCAL_TASK,
    'file' => 'form_example_tutorial.inc',
    );
    $items['examples/form_example/tutorial/6'] = array(
    'title' => '#6',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_6'),
    'access callback' => TRUE,
    'description' => 'Tutorial 6: Form with a validate handler',
    'type' => MENU_LOCAL_TASK,
    'file' => 'form_example_tutorial.inc',
    );
    $items['examples/form_example/tutorial/7'] = array(
    'title' => '#7',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_7'),
    'access callback' => TRUE,
    'description' => 'Tutorial 7: Form with a submit handler',
    'type' => MENU_LOCAL_TASK,
    'file' => 'form_example_tutorial.inc',
    );
    $items['examples/form_example/tutorial/8'] = array(
    'title' => '#8',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_8'),
    'access callback' => TRUE,
    'description' => 'Tutorial 8: Basic multistep form',
    'type' => MENU_LOCAL_TASK,
    'file' => 'form_example_tutorial.inc',
    );
    $items['examples/form_example/tutorial/9'] = array(
    'title' => '#9',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_9'),
    'access callback' => TRUE,
    'description' => 'Tutorial 9: Form with dynamically added new fields',
    'type' => MENU_LOCAL_TASK,
    'file' => 'form_example_tutorial.inc',
    'weight' => 9,
    );
    $items['examples/form_example/tutorial/10'] = array(
    'title' => '#10',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_10'),
    'access callback' => TRUE,
    'description' => 'Tutorial 10: Form with file upload',
    'type' => MENU_LOCAL_TASK,
    'file' => 'form_example_tutorial.inc',
    'weight' => 10,
    );
    $items['examples/form_example/tutorial/11'] = array(
    'title' => '#11',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_11'),
    'access callback' => TRUE,
    'description' => 'Tutorial 11: generating a confirmation form',
    'type' => MENU_LOCAL_TASK,
    'file' => 'form_example_tutorial.inc',
    'weight' => 11,
    );
    $items['examples/form_example/tutorial/11/confirm/%'] = array(
    'title' => 'Name Confirmation',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_tutorial_11_confirm_name', 5),
    'access callback' => TRUE,
    'description' => 'Confirmation form for tutorial 11. Generated using the confirm_form function',
    'file' => 'form_example_tutorial.inc',
    );
    $items['examples/form_example/states'] = array(
    'title' => '#states example',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_states_form'),
    'access callback' => TRUE,
    'description' => 'How to use the #states attribute in FAPI',
    'file' => 'form_example_states.inc',
    );
    $items['examples/form_example/wizard'] = array(
    'title' => 'Extensible wizard example',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_wizard'),
    'access callback' => TRUE,
    'description' => 'A general approach to a wizard multistep form.',
    'file' => 'form_example_wizard.inc',
    );
    $items['examples/form_example/element_example'] = array(
    'title' => 'Element example',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('form_example_element_demo_form'),
    'access callback' => TRUE,
    'file' => 'form_example_elements.inc',
    'weight' => 100,
    );
    return $items;
    }
    /**
    * Page callback for our general info page.
    */
    function form_example_intro() {
    $markup = t('The form example module provides a tutorial, extensible multistep example, an element example, and a #states example');
    return array('#markup' => $markup);
    }
    /**
    * Implements hook_help().
    */
    function form_example_help($path, $arg) {
    switch ($path) {
    case 'examples/form_example/tutorial':
    // TODO: Update the URL.
    $help = t('This form example tutorial for Drupal 7 is the code from the <a href="http://drupal.org/node/262422">Handbook 10-step tutorial</a>');
    break;
    case 'examples/form_example/element_example':
    $help = t('The Element Example shows how modules can provide their own Form API element types. Four different element types are demonstrated.');
    break;
    }
    if (!empty($help)) {
    return '<p>' . $help . '</p>';
    }
    }
    /**
    * Implements hook_element_info().
    *
    * To keep the various pieces of the example together in external files,
    * this just returns _form_example_elements().
    */
    function form_example_element_info() {
    require_once 'form_example_elements.inc';
    return _form_example_element_info();
    }
    /**
    * Implements hook_theme().
    *
    * The only theme implementation is by the element example. To keep the various
    * parts of the example together, this actually returns
    * _form_example_element_theme().
    */
    function form_example_theme($existing, $type, $theme, $path) {
    require_once 'form_example_elements.inc';
    return _form_example_element_theme($existing, $type, $theme, $path);
    }
    /**
    * @} End of "defgroup form_example".
    */ 
