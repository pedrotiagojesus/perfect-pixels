# Perfect-Pixels

Application that transforms images. The background of the images is removed, the DPI is set to 300 and the dimensions are changed to 4267px X 4267px.

## Instalation

### Windows

-   Install [Laragon](https://laragon.org/).
-   Install [Imagick](https://mlocati.github.io/articles/php-windows-imagick.html) no Laragon.

```bash
1. Extract from php_imagick-….zip the php_imagick.dll file, and save it to the ext directory of your PHP installation
2. Extract from php_imagick-….zip the other DLL files (they may start with CORE_RL, FILTER, IM_MOD_RL, or ImageMagickObject depending on the version), and save them to the PHP root directory (where you have php.exe), or to a directory in your PATH variable
3. Add this line to your php.ini file:
extension=php_imagick.dll
Restart the Apache
```

-   In Laragon terminal, install [PyTorch](https://pytorch.org/get-started/locally/).

```bash
PyTorch Build: Stable (1.7.1)
Your OS: Windows
Package: Pip
Language: Python
CUDA: None
```

-   In Laragon terminal, install ffmpeg.

```bash
winget install ffmpeg
```

## How to use

-   Put the images you want to process in the folder \perfect-pixels\public\images\input.
-   In Laragon terminal execute:

```basch
php perfect-pixels\public\index.php
```

-   The final images will apear in \perfect-pixels\public\images\output.

## Improvements

-   Images being formatted to SVG.
-   Improve or remove background image

## Suporte

For support, email pedrotiagojesus1995@gmail.com.
