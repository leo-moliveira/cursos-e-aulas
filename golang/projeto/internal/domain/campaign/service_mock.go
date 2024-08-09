package campaign

import (
	"emailn/internal/contract"
	"github.com/stretchr/testify/mock"
)

type ServiceMock struct {
	mock.Mock
}

func (r *ServiceMock) Create(newCampaign contract.NewCampaign) (string, error) {
	args := r.Called(newCampaign)
	return args.String(0), args.Error(1)
}

func (r *ServiceMock) Get() ([]Campaign, error) {
	//args := r.Called(campaing)
	return nil, nil
}

func (r *ServiceMock) GetBy(id string) (*Campaign, error) {
	args := r.Called(id)
	return args.Get(0).(*Campaign), args.Error(1)
}
