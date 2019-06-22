# For God So loved the world, that He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life.

Praise Jesus, this is a Wordpress plug-in. We hope to make many additions, right now it is meant to work alongside the [Android app](https://play.google.com/store/apps/details?id=org.openorphanage.m1aleluya2)

### Mission
🕆 Serve the Lord, Jesus, by providing free and open source software for orphanages, to help manage their operations and communications and to aid with meeting needs through fund raising and sponsorship.

 - [Homepage](https://openorphanage.org)
 - [Facebook page - hallelujah](https://www.facebook.com/Open-Orphanage-in-Jesus-name-2168084633282357)



### Getting Started

#### Requirements for dev version
 * A working wordpress installation 5.0+ with mysql etc...
 * Composer
 * PHP 7.0 +

##### Optional Requirements
 * nodejs and npm for Guten Block generation
 * [wp-cli](https://wp-cli.org)
 * phpunit

#### Steps

Make sure you have composer installed.
From your wordpress installation
`
  cd wp-content/plugins
  git clone https://github.com/open-orphanage-in-jesus-name/wordpress-open-orphanage-aleluya.git
  mv wordpress-open-orphanage-aleluya open-orphanage
  cd open-orphanage
  composer install
`
Then in the administrator activate the plugin. You will want to configure the Open Orphanage settings such as adding test stripe api keys and enabling user registrations, and add children. There additionally are some setting in each user's profile.


### External Services

The plug-in can optionally work with both IFTTT and with Stripe. 

#### 🕆 Stripe
Currently the plug-in allows integration with [Stripe](https://www.stripe.com). When a person signs up as a donor, it will create a stripe customer for the donor and attempt to synchronize the stripe customer details from Wordpress to Stripe. We currently are working on the on-site charging mechanism, and currently you are notified by email the child that a sponsor is interested in, and the user's email address. If stripe is not enabled, then you are still forwarded a users email when they indicate interest in a child. These are currently stored clear text in the password and demonstrated to everyone who is an administrator or has access to the database and backup SQL files.

 - View the [Stripe Privacy Policy](https://stripe.com/privacy)

#### 🕆 IFTTT
If you place an [IFTTT](https://www.ifttt.com) web service key and event name, this will call that IFTTT webservice upon a person being interested in sponsoring a child. We may in the future expand what can be done through this service. These are currently stored clear text in the password and demonstrated to everyone who is an administrator or has access to the database and backup SQL files.

 - View the [IFTTT Privacy Policy](https://ifttt.com/privacy)
 
 


## Additional Development Notes:

### Composer
Hallelujah, as stated above we need to run composer install in the plugin directory for it to run.

### PHPUnit
The github distribution has phpunit testing enabled. Make sure you have phpunit and wp-cli installed, use the bin/install-wp-tests.sh to set up the testing db and install and then run phpunit in the root of the plugin directory. More tutorials are available online.

### Create Guten Block

This project was bootstrapped with [Create Guten Block](https://github.com/ahmadawais/create-guten-block).

Below you will find some information on how to run scripts.

>You can find the most recent version of this guide [here](https://github.com/ahmadawais/create-guten-block).

### 👉  `npm start`
- Use to compile and run the block in development mode.
- Watches for any changes and reports back any errors in your code.

### 👉  `npm run build`
- Use to build production code for your block inside `dist` folder.
- Runs once and reports back the gzip file sizes of the produced code.

### 👉  `npm run eject`
- Use to eject your plugin out of `create-guten-block`.
- Provides all the configurations so you can customize the project as you want.
- It's a one-way street, `eject` and you have to maintain everything yourself.
- You don't normally have to `eject` a project because by ejecting you lose the connection with `create-guten-block` and from there onwards you have to update and maintain all the dependencies on your own.

---

###### Feel free to tweet and say 👋 at me [@MrAhmadAwais](https://twitter.com/mrahmadawais/)

[![npm](https://img.shields.io/npm/v/create-guten-block.svg?style=flat-square)](https://www.npmjs.com/package/create-guten-block) [![npm](https://img.shields.io/npm/dt/create-guten-block.svg?style=flat-square&label=downloads)](https://www.npmjs.com/package/create-guten-block)  [![license](https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square)](https://github.com/ahmadawais/create-guten-block) [![Tweet for help](https://img.shields.io/twitter/follow/mrahmadawais.svg?style=social&label=Tweet%20@MrAhmadAwais)](https://twitter.com/mrahmadawais/) [![GitHub stars](https://img.shields.io/github/stars/ahmadawais/create-guten-block.svg?style=social&label=Stars)](https://github.com/ahmadawais/create-guten-block/stargazers) [![GitHub followers](https://img.shields.io/github/followers/ahmadawais.svg?style=social&label=Follow)](https://github.com/ahmadawais?tab=followers)
