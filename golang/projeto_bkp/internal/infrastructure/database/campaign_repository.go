package database

import (
	"emailn/internal/domain/campaign"
	"gorm.io/gorm"
)

type CampaignRepository struct {
	Db *gorm.DB
}

func (c *CampaignRepository) Save(campaign *campaign.Campaign) error {
	tx := c.Db.Create(campaign)
	return tx.Error
	//return errors.New(" an error")
}

func (c *CampaignRepository) Get() ([]campaign.Campaign, error) {
	var campaigns []campaign.Campaign

	tx := c.Db.Find(&campaigns)
	return campaigns, tx.Error
}

func (c *CampaignRepository) GetByID(id string) (*campaign.Campaign, error) {
	var campaign campaign.Campaign
	tx := c.Db.First(&campaign, "id = ?", "id = ?", id)
	return &campaign, tx.Error
}

func (c *CampaignRepository) Update(id string) error {
	var campaign campaign.Campaign

	tx := c.Db.First(&campaign, "id = ?", id)

	//	campaign.Status = status
}
