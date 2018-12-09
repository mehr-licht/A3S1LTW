# API

## Posts

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