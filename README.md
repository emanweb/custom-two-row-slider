# Custom Two Row Slider

A WordPress plugin that creates a beautiful two-row slider with 4 items per row using the Slick Carousel library.

## Description

Custom Two Row Slider is a lightweight WordPress plugin that allows you to create elegant image sliders with two rows of content. Each row displays 4 items, making it perfect for showcasing portfolios, products, or any other content in a grid-like slider format.

## Features

- Two-row slider layout with 4 items per row
- Responsive design
- Smooth sliding animations
- Customizable through shortcode
- Built with Slick Carousel for optimal performance
- Easy to implement and use

## Installation

1. Download the plugin files
2. Upload the plugin folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

## Usage

### Basic Usage

Use the shortcode `[two_row_slider]` to display the slider. You'll need to provide image IDs and optionally a title:

```php
[two_row_slider images="1,2,3,4,5,6,7,8" title="My Gallery"]
```

### Parameters

- `images` (required): Comma-separated list of WordPress media attachment IDs
- `title` (optional): Title to display above the slider

### Example

Here's a complete example of how to use the shortcode:

```php
[two_row_slider images="123,124,125,126,127,128,129,130" title="Our Portfolio"]
```

### Adding Images

1. Upload your images to the WordPress Media Library
2. Note down the attachment IDs of the images you want to use
3. Use these IDs in the shortcode's `images` parameter

## Requirements

- WordPress 5.0 or higher
- PHP 7.0 or higher
- jQuery (included with WordPress)

## Support

For support, please visit [https://culturahr.com](https://culturahr.com)

## Author

Created by Emanuel Costa - [https://www.hightechweb.com](https://www.hightechweb.com)

## License

This plugin is licensed under the GPL v2 or later.

## Changelog

### 1.0.0
- Initial release
- Basic two-row slider functionality
- Slick Carousel integration
- Shortcode implementation 