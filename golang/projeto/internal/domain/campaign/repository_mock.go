package campaign

import "github.com/stretchr/testify/mock"

type RepositoryMock struct {
	mock.Mock
}

func (r *RepositoryMock) Save(campaign *Campaign) error {
	args := r.Called(campaign)
	return args.Error(0)
}

func (r *RepositoryMock) Get() ([]Campaign, error) {
	//args := r.Called(campaign)
	return nil, nil
}

func (r *RepositoryMock) GetBy(id string) (*Campaign, error) {
	return nil, nil
}
