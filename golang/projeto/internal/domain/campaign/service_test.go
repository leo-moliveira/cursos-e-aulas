package campaign

import (
	"emailn/internal/contract"
	"github.com/stretchr/testify/assert"
	"github.com/stretchr/testify/mock"
	"testing"
)

func Test_create_Campaign(t *testing.T) {
	assert := assert.New(t)
	service := Service{}
	newCampaign := contract.NewCampaign{
		Name:     "Teste Y",
		Content:  "Body",
		Contacts: []string{"test@test.com", "test2@test.com", "test3@test.com"},
	}

	id, err := service.Create(newCampaign)
	assert.NotNil(id)
	assert.Nil(err)
}

func Test_create_SaveCampaign(t *testing.T) {

	newCampaign := contract.NewCampaign{
		Name:     "Teste Y",
		Content:  "Body",
		Contacts: []string{"test@test.com", "test2@test.com", "test3@test.com"},
	}
	repositoryMock := new(RepositoryMock)
	repositoryMock.On("Save", mock.MatchedBy(func(campaign *Campaign) bool {
		if campaign.Name != newCampaign.Name ||
			campaign.Content != newCampaign.Content ||
			len(campaign.Contacts) != len(newCampaign.Contacts) {
			return false
		}
		return true
	})).Return(nil)
	service := Service{
		Repository: repositoryMock,
	}

	service.Create(newCampaign)

	repositoryMock.AssertExpectations(t)
}
