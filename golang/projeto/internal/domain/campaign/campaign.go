package campaign

import "time"

type Contact struct {
	Email string
}

type Campaign struct {
	ID        string
	Name      string
	CreatedAt time.Time
	UpdatedAt time.Time
	Content   string
	Contacts  []Contact
}
