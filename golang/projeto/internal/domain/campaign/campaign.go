package campaign

import (
	"emailn/internal"
	"github.com/rs/xid"
	"time"
)

const (
	Pending string = "PENDING"
	Failed  string = "FAILED"
	Done    string = "DONE"
)

type Campaign struct {
	ID        string `validate:"required"`
	Name      string `validate:"min=5,max=24"`
	CreatedAt time.Time
	UpdatedAt time.Time
	Content   string    `validate:"min=5,max=1024"`
	Contacts  []Contact `validate:"min=1,dive"`
	Status    string
}

func NewCampaign(name string, content string, emails []string) (*Campaign, error) {
	contacts := make([]Contact, len(emails))

	for index, email := range emails {
		contacts[index].Email = email
	}

	campaign := &Campaign{
		ID:        xid.New().String(),
		Name:      name,
		Content:   content,
		CreatedAt: time.Now(),
		UpdatedAt: time.Now(),
		Contacts:  contacts,
		Status:    Pending,
	}
	err := internal.ValidateStruct(campaign)
	if err == nil {
		return campaign, err
	}
	return nil, err
}
