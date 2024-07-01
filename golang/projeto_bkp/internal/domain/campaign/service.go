package campaign

import (
	"emailn/internal/contract"
	internalErrors "emailn/internal/internalErrors"
	"errors"
)

type Service interface {
	Create(campaign contract.NewCampaign) (string, error)
	Get() (*contract.CampaignResponse, error)
	GetBy(id string) (*contract.CampaignResponse, error)
	Cancel(id string) error
}

type ServiceImp struct {
	Repository Repository
}

func (s *ServiceImp) Create(newCampaign contract.NewCampaign) (string, error) {

	campaign, err := NewCampaign(newCampaign.Name, newCampaign.Content, newCampaign.Emails)

	if err != nil {
		return "", err
	}

	err = s.Repository.Save(campaign)

	if err != nil {
		return "", internalErrors.ErrInternal
	}

	return campaign.ID, nil
}

func (s *ServiceImp) GetBy(id string) (*contract.CampaignResponse, error) {

	campaign, err := s.Repository.GetBy(id)

	if err != nil {
		return nil, internalErrors.ErrInternal
	}

	return &contract.CampaignResponse{
		ID:      campaign.ID,
		Name:    campaign.Name,
		Content: campaign.Content,
		Status:  campaign.Status,
	}, nil
}

func (s *ServiceImp) Get() (*contract.CampaignResponse, error) {

	campaign, err := s.Repository.Get()

	if err != nil {
		return nil, internalErrors.ErrInternal
	}

	return &contract.CampaignResponse{
		ID:      campaign.ID,
		Name:    campaign.Name,
		Content: campaign.Content,
		Status:  campaign.Status,
	}, nil
}

func (s *ServiceImp) Cancel(id string) error {

	campaign, err := s.Repository.GetBy(id)

	if err != nil {
		return internalErrors.ErrInternal
	}

	if campaign.Status != Pending {
		return errors.New("Campaign status is invalid")
	}

	campaign.Cancel()

	err = s.Repository.Update()

	if err != nil {
		return internalErrors.ErrInternal
	}
}
