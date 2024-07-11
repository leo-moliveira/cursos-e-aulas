package campaign

import (
	"time"
)

type Campaign struct {
	ID        string
	Name      string
	CreatedAt time.Time
	UpdatedAt time.Time
	Content   string
	Contacts  []Contact
}

func NewCampaign(name string, content string, emails []string) *Campaign {
	contacts := make([]Contact, len(emails))

	for index, email := range emails {
		contacts[index].Email = email
	}

	return &Campaign{
		ID:        "1",
		Name:      name,
		Content:   content,
		CreatedAt: time.Now(),
		UpdatedAt: time.Now(),
		Contacts:  contacts,
	}
}
