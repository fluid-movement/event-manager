# Event page for Freestyle Frisbee

```mermaid
graph
	user["User"]
	group["Group"]
	event["Event"]
	user -- is in --> group
	user -- creates --> event
	user -- subscribes to --> event
	event -- hosted by --> group
```

## what is it
- A page for seeing what events are happening, when and where
- Users are part of a "Group" (aka frisbee crew)
- Users can create events, and subscribe to events to receive updates
- The organizers (members of the crew) can see who has subscribed to their event and send notifications to them (useful during events)
- **no social features** Users can't see other users, no public profiles
- "new events" section, events since the last time the user looked at the page

## Entities

### User
- Users must register
- Can be part of one (or more?) groups (aka frisbee crews)
- If they are part of a group, they can:
    - create an event
    - edit an event of that group
    - write updates (news feed)
- Can decide how they want to be contacted on changes to subscribed events
- can subscribe to a calendar with their events they are interested in

### Event
- Is hosted by a group (or frisbee crew)
- has
    - description
    - picture
    - simple timetable?
    - news feed
- Can be at a "tbd" date, in a certain month

### Group
- Events are tied to a group
- Everyone in a group can edit an event, or perform actions on it

## Questions
- who can delete events?
- who can create events?

## Pages
- /dashboard (name tbd)
- /events
- /profile
    - How to contact
    - Which crew are you part of
- /groups
    - small profile page for the crew
- /login
- /register

## For the future
- Page also has an API to get events?
- Event "Happening this month preview"
- "find jams in your area"?
- .ics subscription?
