package campaign

import (
	"github.com/stretchr/testify/assert"
	"testing"
)

func TestNewCampaign(t *testing.T) {
	assert.New(t)
	name := "Campaign X"
	content := "Body"
	contact := []string{"email@e.com", "email2@e.com"}

	campaign := NewCampaign(name, content, contact)

	assert.Equal(t, "1", campaign.ID)
	assert.Equal(t, name, campaign.Name)
	assert.Equal(t, content, campaign.Content)
	assert.Equal(t, len(contact), len(campaign.Contacts))
}
