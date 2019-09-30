# Tinder-API-Wrapper


The Most recent PHP Tinder API Wrapper on Github.

$h = new tinder("PUT-TINDER-API-HERE");


# Available features are:
- Get Matches ID

```sh
$tinder->get_matches(0)
$tinder->get_matches(1)
```
This Function either returns matches that you already sent a message to or never

- Send Message to specific User

```sh
$tinder->send_Message($UserID, $Message)
```
You need to put the user ID and a specific message to send

- Get new users in your location
```sh
$tinder->get_new()
```
this will return a json array of new users in your area

- Swipe right or left
```sh
$tinder->swipe($UserID,'pass')
```
for left
```sh
$tinder->swipe($UserID,'like')
```
for right
