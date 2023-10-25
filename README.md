<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Larvel Calendar Attendance Form Application
User can register and log in.
A logged in user can complete the attendance form.
Submitting the attendance form updates one single shared Google Calendar with a new event.

## やり方
1. In Google API console, create a new project
2. Enable Google Calendar API and Services
3. Create Credentials
4. Download "Service Account Key" to $storage/app/google-calendar/file-name.json
5. Add above .json path and filename in config/google-calendar.php
6. Copy the service account email
7. Paste into Google Calendar Settings > Share With Specific People > Add People > Add Service Account
8. Copy the Google Calendar ID GOOGLE_CALENDAR_ID= in .env file
9. Configure .env to your preferred database
10. [テストカレンダー](https://calendar.google.com/calendar/embed?src=d8bd7c59c9d6adcba8092336d21e4da22a8dcc408cb19344f9814f6081a9baa2%40group.calendar.google.com&ctz=Asia%2FTokyo) 
11. config/app.php >> 'locale' => 'ja', //change to 'en' for English Version
