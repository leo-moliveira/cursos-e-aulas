package campaign

import (
	"github.com/jaswdr/faker"
	"github.com/stretchr/testify/assert"
	"testing"
	"time"
)

var (
	name     = "Campaign X"
	content  = "body HI!"
	contacts = []string{"email1@e.com", "email1@e.com"}
	fake     = faker.New()
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

func Test_NewCampaign_MustValidateNameMin(t *testing.T) {
	tAssert := assert.New(t)

	_, err := NewCampaign("", content, contacts)

	tAssert.Equal(err.Error(), "name is required with min 5")

}

func Test_NewCampaign_MustValidateNameMax(t *testing.T) {
	tAssert := assert.New(t)

	_, err := NewCampaign(fake.Lorem().Text(26), content, contacts)

	tAssert.Equal(err.Error(), "name is required with max 24")

}

func Test_NewCampaign_MustValidateContentMin(t *testing.T) {
	tAssert := assert.New(t)

	_, err := NewCampaign(name, "", contacts)

	tAssert.Equal(err.Error(), "content is required with min 5")

}

func Test_NewCampaign_MustValidateContentMax(t *testing.T) {
	tAssert := assert.New(t)

	_, err := NewCampaign(name, fake.Lorem().Text(1040), contacts)

	tAssert.Equal(err.Error(), "content is required with max 1024")

}

func Test_NewCampaign_MustValidateContactsMin(t *testing.T) {
	tAssert := assert.New(t)

	_, err := NewCampaign(name, content, nil)

	tAssert.Equal(err.Error(), "contacts is required with min 1")

}

func Test_NewCampaign_MustValidateContacts(t *testing.T) {
	tAssert := assert.New(t)

	_, err := NewCampaign(name, content, []string{})

	tAssert.Equal(err.Error(), "contacts is required with min 1")

}

func Test_NewCampaign_MustValidateContactsInvalidEmail(t *testing.T) {
	tAssert := assert.New(t)

	_, err := NewCampaign(name, content, []string{"email_invalid"})

	tAssert.Equal(err.Error(), "email is invalid")

}
