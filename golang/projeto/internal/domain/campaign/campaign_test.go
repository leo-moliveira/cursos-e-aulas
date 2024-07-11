package campaign

import (
	"github.com/stretchr/testify/assert"
	"testing"
	"time"
)

var (
	name    = "Campaign X"
	content = "Body"
	contact = []string{"email@e.com", "email2@e.com"}
)

func TestNewCampaign(t *testing.T) {
	assert.New(t)

	campaign := NewCampaign(name, content, contact)

	assert.Equal(t, name, campaign.Name)
	assert.Equal(t, content, campaign.Content)
	assert.Equal(t, len(contact), len(campaign.Contacts))
}

func Test_NewCampaign_IDIsNotNil(t *testing.T) {
	assert.New(t)

	campaign := NewCampaign(name, content, contact)

	assert.NotNil(t, campaign.ID)
}

func Test_NewCampaign_CreatedAtMustBeNow(t *testing.T) {
	assert.New(t)
	now := time.Now().Add(-time.Minute)

	campaign := NewCampaign(name, content, contact)

	assert.Greater(t, campaign.CreatedAt, now)
}
