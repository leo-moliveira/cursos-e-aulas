package campaign

import (
	"github.com/rs/xid"
	"time"
)

const (
	Pending  string = "PENDING"
	Canceled string = "CANCELED"
	Started  string = "STARTED"
	Done     string = "DONE"
)

type Contact struct {
	ID         string `gorm:"size:50;PRIMARY_KEY"`
	Email      string `validate:"email" gorm:"size:100"`
	CampaignID string `gorm:"size:50"`
}

type Campaign struct {
	ID        string    `validate:"required" gorm:"size:50;PRIMARY_KEY"`
	Name      string    `validate:"min=5,max=24" gorm:"size:100"`
	CreatedAt time.Time `validate:"required"`
	Content   string    `validate:"min=5,max=1024" gorm:"size:1024"`
	Contacts  []Contact `validate:"min=1,dive"`
	Status    string    `gorm:"size:20;DEFAULT:PENDING"`
}

func (c Campaign) Cancel() {
	c.Status = Canceled
}

func NewCampaign(name string, content string, emails []string) (*Campaign, error) {

	contacts := make([]Contact, len(emails))

	for index, email := range emails {
		contacts[index].ID = xid.New().String()
		contacts[index].Email = email
	}

	return &Campaign{
		ID:        xid.New().String(),
		Name:      name,
		Content:   content,
		CreatedAt: time.Now(),
		Contacts:  contacts,
	}, nil
}
