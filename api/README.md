# API

## Description

This REST API offers a interface for ...

The supported request bodies are JSON only, and the responses are all sent in JSON as well.

Every response has a `code` attribute. Negative values indicate an error. Moreover, there's a `description` field, which is useful for errors as it provides an explanation. Further attributes are specific to each API call.

## API for Posts

### Votes

Update user vote in a specific post.

#### URL

`[POST] /api/post_vote.php`

#### Request body

| Parameter | Type | Description | 
| --------- | ---- | ----------- |
| `postId`  | `number` | Identifies the post where the user performed the action |
| `vote`    | `number` Possible values are `1` (up vote), `-1` (down vote), `0` (no vote) | The vote by the user |
| `username` (**optional**) | `string` | Unique identifier for the user. This field is only required outside webbrowser usage |

#### Response

| HTTP Status Code | Code | Description |
| `200` | `0` | Successfully updated user vote |
| `400` | `-1` | Mandatory parameters are missing |
| `500` | `-2` | Internal exception |