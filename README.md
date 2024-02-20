# LN Prints application

This project is the website for [LN Prints](https://ln-prints.nl).

# Table of contents

[1.0 Installation](#10-installation)  
[1.1 Environment](#11-environment)  
[1.2 Composer dependencies](#12-composer-dependencies)  
[1.3 Setup Sail](#13-setup-sail)  
[1.4 Migrate database](#14-migrate-database)  
[1.5 Media](#15-media)  
[1.5.1 Mac OS](#151-mac-os)  
[1.5.2 Sail](#152-sail)   
[2.0 Laravel Nova](#20-laravel-nova)  
[3.0 Laravel Telescope](#30-laravel-telescope)  
[4.0 Laravel Horizon](#40-laravel-horizon)  
[5.0 Tests](#50-tests)

# 1.0 Installation

Follow the steps below to initialize the project.

## 1.1 Environment

* Create an .env file adjusted to your needs (take .env.example as example)

## 1.2 Composer dependencies

* Install composer dependencies with `composer install`.

## 1.3 Setup Sail

* Install Sail with `sail build --no-cache`.
* Run `sail up -d` to bring up the docker containers.
* Run the command `sail artisan storage:link` to link the storage folder to the public folder.

## 1.4 Migrate database

* Migrate the database by running the `sail artisan migrate` command in the terminal.

## 1.5 Media

Because we use spatie media library and video uploads you must install FFmpeg to generate images from the uploaded
video.

### 1.5.1 Mac OS

Execute the following command in the terminal.

```bash
brew install ffmpeg
```

Add the following variables to your environment.

```bash
FFMPEG_PATH="/usr/local/bin/ffmpeg"
FFPROBE_PATH="/usr/local/bin/ffprobe"
```

### 1.5.2 Sail

Execute the following command in the terminal.

```bash
sail shell
sudo apt update
sudo apt install ffmpeg
```

Add the following variables to your environment.

```bash
FFMPEG_PATH="/usr/bin/ffmpeg"
FFPROBE_PATH="/usr/bin/ffprobe"
```

# 2.0 Laravel Nova

This project uses Laravel Nova for managing resources. Navigate to `/nova` to enter the Laravel Nova panel.

> **NOTE**: The path can be configured in the .env file with `NOVA_PATH=`

# 3.0 Laravel Telescope

This project uses Laravel Telescope for debugging purposes. Navigate to `/telescope` to enter the Laravel Telescope
panel.

> **NOTE**: The path can be configured in the .env file with `TELESCOPE_PATH=`

> **NOTE**: Nova should be disabled on production to increase performance by configuring `TELESCOPE_ENABLED=false` in the .env file

# 4.0 Laravel Horizon

This project uses Laravel Horizon to manage queues. Navigate to `/horizon` to enter the Laravel Horizon panel.

> **NOTE**: The path can be configured in the .env file with `HORIZON_PATH=`

> **NOTE**: Laravel Horizon uses redis so make sure you've configured redis in `config/queue.php`!

> **NOTE**: If you are running Laravel Homestead, it's useful to configure Supervisor to monitor (and therefore
> automatically restart) the horizon process. [Read more](https://laravel.com/docs/master/horizon#deploying-horizon).

# 5.0 Tests

This project includes some tests, execute the following command in the terminal to start them:

```bash
sail artisan test
```
