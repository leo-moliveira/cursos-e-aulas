package campaign

import (
	"errors"
	"github.com/rs/xid"
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

func NewCampaign(name string, content string, emails []string) (*Campaign, error) {
	if name == "" {
		return nil, errors.New("name is required")
	} else if content == "" {
		return nil, errors.New("content is required")
	} else if len(emails) == 0 {
		return nil, errors.New("contacts is required")
	}

	contacts := make([]Contact, len(emails))

	for index, email := range emails {
		contacts[index].Email = email
	}

	return &Campaign{
		ID:        xid.New().String(),
		Name:      name,
		Content:   content,
		CreatedAt: time.Now(),
		UpdatedAt: time.Now(),
		Contacts:  contacts,
	}, nil
}
