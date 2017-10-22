<?php
/**
 * Initialize DopeFramework
 */

/**
 * DEFINES
 */

define( 'DF_VERSION', '1.0' );

/**
 * FRAMEWORK CLASSES
 */

require_once 'includes/classes/dopeBodyClass.class.php';
require_once 'includes/classes/dopeUserForm.class.php';
require_once 'includes/classes/dopeItemForm.class.php';
require_once 'includes/classes/dopePagination.class.php';

/**
 * FRAMEWORK FUNCTIONS
 */

// Styles
include 'includes/dt.styles.php';

// Scripts
include 'includes/dt.scripts.php';

// Helpers
include 'includes/dt.helpers.php';

// SEO Optimization
include 'includes/dt.seo.php';

// Menu
include 'includes/dt.menu.php';

// Breadcrumbs
include 'includes/dt.breadcrumbs.php';

// Messages
include 'includes/dt.messages.php';

// Pagination
include 'includes/dt.pagination.php';

// Extra Functionality
include 'includes/dt.extras.php';

// Debugger and Profiler
include 'includes/dt.debug.php';

/**
 * FRAMEWORK EXTENSIONS
 */
// nothing so far

/**
 * FRAMEWORK ADMIN PANEL
 */
include 'includes/dt.admin.php';

// General Settings
osc_admin_menu_appearance( __( 'Theme Settings', 'symnel' ), osc_admin_render_theme_url( 'oc-content/themes/symnel/framework/admin/general_settings.php' ), 'settings_dope' );
