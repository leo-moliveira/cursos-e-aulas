package campaign

import (
	"emailn/internal/contract"
	"emailn/internal/internalErrors"
	"errors"
	"github.com/stretchr/testify/assert"
	"github.com/stretchr/testify/mock"
	"testing"
)

var (
	newCampaign = contract.NewCampaign{
		Name:    "Test Y",
		Content: "Body Hi!",
		Emails:  []string{"teste1@test.com"},
	}
	service = Service{}
)

type repositoryMock struct {
	mock.Mock
}

func (r *repositoryMock) Save(campaign *Campaign) error {
	args := r.Called(campaign)

	return args.Error(0)
}

func Test_Create_Campaign(t *testing.T) {
	tAssert := assert.New(t)
	repositoryMock := new(repositoryMock)
	repositoryMock.On("Save", mock.Anything).Return(nil)
	service.Repository = repositoryMock
	id, err := service.Create(newCampaign)

	tAssert.NotNil(id)
	tAssert.Nil(err)
}

func Test_Create_ValidateDomainError(t *testing.T) {
	tAssert := assert.New(t)

	_, err := service.Create(contract.NewCampaign{})

	tAssert.NotNil(err)
	tAssert.False(errors.Is(internalErrors.ErrInternal, err))
}

func Test_Create_SaveCampaign(t *testing.T) {
	repositoryMock := new(repositoryMock)
	repositoryMock.On("Save", mock.MatchedBy(func(campaign *Campaign) bool {
		if campaign.Name != newCampaign.Name {
			return false
		} else if campaign.Content != newCampaign.Content {
			return false
		} else if len(campaign.Contacts) != len(newCampaign.Emails) {
			return false
		}

		return true
	})).Return(nil)
	service.Repository = repositoryMock
	service.Create(newCampaign)

	repositoryMock.AssertExpectations(t)
}

func Test_Create_ValidateRepositorySave(t *testing.T) {
	tAssert := assert.New(t)
	repositoryMock := new(repositoryMock)
	repositoryMock.On("Save", mock.Anything).Return(errors.New("error to save on database"))
	service.Repository = repositoryMock

	_, err := service.Create(newCampaign)

	tAssert.True(errors.Is(internalErrors.ErrInternal, err))
}
