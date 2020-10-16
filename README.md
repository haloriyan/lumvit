# Hotel Website with PHP Native

This repo just for educational purpose, not sure if used for real hotel's website due to security (and can be) performance issue. In order to educational purpose, there may not be any updates. 

## Feature

- Booking system
- Booking calendar
- Send email for booking confirmation
- Accommodation management
 - Manage Rooms and Facilities
 - Gallery
 - Review
 - Services
 - Amenities
- Dynamic rates based on available seasons
- Promotion banner

## How to Install

1. Clone this repo and move into server directory (example: `/var/www/html/`).
2. Edit VHosts on your web server configuration, change the DocumentRoot and point to public/ directory (example: `/var/www/html/public/`)
3. Rename .env.example to .env, open it up, and change any information that must be changed
4. Create new database with name as you had wrote in .env
5. Run `migrate.php` using browser
6. Open `/install` using browser and follow the installation wizard to install your website automatically
7. Done

## Documentation and Support

Any further information you will need, are available in docs/ directory. But if you can't find some information that you need to do, or you didn't get it yet, feel free to ask to me question.

## License

Because you had already paid for this, obviously you can modify any codes as you need either for the "hotel's website" code or it core framework if you can read and understand how it works.