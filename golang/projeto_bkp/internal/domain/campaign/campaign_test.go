package campaign

import (
	"github.com/stretchr/testify/assert"
	"testing"
	"time"
)

var (
	name     = "Campaign X"
	content  = "body"
	contacts = []string{"email1@e.com", "email1@e.com"}
)

func Test_NewCampaign_CreateCampaign(t *testing.T) {
	tAssert := assert.New(t)

	campaign, _ := NewCampaign(name, content, contacts)

	tAssert.Equal(name, campaign.Name)
	tAssert.Equal(content, campaign.Content)
	tAssert.Equal(len(contacts), len(campaign.Contacts))

}

func Test_NewCampaign_IDIsNotNil(t *testing.T) {
	tAssert := assert.New(t)

	campaign, _ := NewCampaign(name, content, contacts)

	tAssert.NotNil(campaign.ID)
}

func Test_NewCampaign_CreatedAtMustBeNow(t *testing.T) {
	tAssert := assert.New(t)
	now := time.Now().Add(time.Duration(-time.Minute))

	campaign, _ := NewCampaign(name, content, contacts)

	tAssert.Greater(campaign.CreatedAt, now)

}

func Test_NewCampaign_MustValidateName(t *testing.T) {
	tAssert := assert.New(t)

	_, err := NewCampaign("rrrrrr", content, contacts)

	tAssert.Equal(err.Error(), "name is required ")

}

func Test_NewCampaign_MustValidateContent(t *testing.T) {
	tAssert := assert.New(t)

	_, err := NewCampaign(name, "", contacts)

	tAssert.Equal(err.Error(), "content is required ")

}

func Test_NewCampaign_MustValidateContacts(t *testing.T) {
	tAssert := assert.New(t)

	_, err := NewCampaign(name, content, []string{})

	tAssert.Equal(err.Error(), "contacts is required ")

}
