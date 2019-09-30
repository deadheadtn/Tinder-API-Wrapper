# Tinder-API-Wrapper


The Most recent PHP Tinder API Wrapper on Github.

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
