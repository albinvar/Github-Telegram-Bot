<h1 align="center"> Github Telegram Bot</h1> <br>
<p align="center">
  <a href="https://test.com">
    <img src="https://i.ibb.co/SxLvgjs/Bot-banner.png" alt="logo" width="190" border="0">
  </a>
<img src="https://img.shields.io/github/repo-size/albinvar/Github-Telegram-Bot">
<a href="LICENSE"><img src="https://img.shields.io/apm/l/Github"></a>
</p>

Github Telegram Bot is a php bot for notifying Events from your github repository.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Screenshots](#screenshots)
- [Installation](#installation-heroku)
- [Contributing](#contributing)
- [License](#license)

## Introduction

This is the introduction section and a brief description is provided within this section.

## Features 

Get Instant Notifications for 

- Pushes
- Pull Request(open)
- Comment
- Issue(open)
- Issue(close)
- Merge

### Create a New Bot
1. Add [@BotFather](https://telegram.me/botfather) to start conversation.
2. Type `/newbot` and **@BotFather** will ask the name for your bot.
3. Choose a cool name, for example `My Github Bot` and hit enter.
4. Now choose a username for your bot. It must end in *bot*, for example `GithubBot` or `Github_Bot`.
5. If succeed, **@BotFather** will give you API key to be used in this bot.

## Screenshots
<p align="center">
<img src="https://i.ibb.co/pxnY7Wf/ezgif-com-optimize.gif" height="300">
</p>

## Installation (Heroku)


0. Create a Account on [Heroku](https://heroku.com)

1. Click `Create New App` in Heroku Dashboard

2. Enter App Name and click on create app

3. Now install Heroku CLI on your Computer [Instuctions](https://devcenter.heroku.com/articles/heroku-cli)

4. Now open your terminal and run command `git clone https://github.com/albinvar/Github-Telegram-Bot.git`

5. It will download Latest codes for you in your Device
    
6. Now change the directory to test using command `cd test`

7. Now Login into Heroku CLI using command `heroku login -i` now enter your login details and hit Enter

8. After Login run this command in terminal `heroku git:remote -a appName` here appName will be your app's name that you choose while creating the app.

9. Now run follow commands in termial to install packages `heroku buildpacks:add heroku/php`

10. Now run this command in your terminal `git push heroku master`, if this gives an error try this `git push -f heroku master`

11. All done now it will take time to complete, after that you can visit your domain shown in terminal.

## Installation on Heroku (Easy way)
Easily deploy using the button below

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

## Installation (VPS/Localhost)

1. Clone the repository using git. `git clone https://github.com/albinvar/Github-Telegram-Bot.git`

2. Install all pacakges using composer. `composer install`

3. Now change your directory using `cd Github-Telegram-Bot`

4. Start a localhost using `php -S localhost:8080` 

5. You can setup your port-forwarding method. (Services like ngrok, serveo.net)

## Setup Port-forwarding

1. Install and Configure ngrok on your localmachine.

2. Start Port-forwarding using the command `ngrok http 8080`

3. Set the link with https as webhook using setWebhook.php 

4. You are good to go...

## Set Webhook 

1. Open `http://YOUR_DOMAIN.COM/setWebhook.php` on your server/localhost.

2. It will set your webhook based on the current server address for receiving calls from Telegram API. 

3. If you get a message saying "webhook set successfully". You are good to go....

## Set webhook on Github

1. Choose a repository on Github which you want to receive notifications. 

2. Direct to repo-settings->webhooks->add webhook

3. Set the payload url ngrok/website link.

4. Select `application/x-www-form-urlencoded` and select `All Events`

5. Hit Enter and you will get all notifications from your Telegram bot

```Note that : Your ngrok link will expire after sometimes. Using webhosting/vps is suggested```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
This project is certified using [MIT License](https://github.com/albinvar/Github-Telegram-Bot/blob/main/LICENSE)
