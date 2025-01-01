# Animated Feature Box

A WordPress plugin that adds a beautiful animated feature box widget to Elementor.

## Features

- Smooth zoom-in animation on page load
- Hover lift effect
- Customizable icon, title, description, and link
- Color customization options
- Responsive design

## Installation

1. Upload the `animated-feature-box` folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Ensure Elementor is installed and activated

## Usage

1. Edit a page with Elementor
2. Find "Animated Feature Box" in the widget panel
3. Drag and drop the widget into your page
4. Customize:
   - Icon (any FontAwesome icon)
   - Title
   - Description
   - Link URL
   - Colors (icon, title, description)

## Requirements

- WordPress 5.0 or higher
- Elementor 3.0.0 or higher
- PHP 7.0 or higher

## File Structure

```
animated-feature-box/
├── assets/
│   └── css/
│       ├── animations.css    # Animation styles
│       └── feature-box.css   # Component styles
├── templates/
│   └── feature-box.php      # HTML template
├── widgets/
│   └── animated-feature-box.php  # Widget class
├── animated-feature-box.php  # Main plugin file
└── README.md
```

## Customization

### CSS Classes

- `.feature-box` - Main container
- `.wow` - Animation container
- `.zoomIn` - Zoom animation

### Filters

None currently implemented.
