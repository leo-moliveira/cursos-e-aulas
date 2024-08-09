package database

import "emailn/internal/domain/campaign"

type Campaignepository struct {
	campaigns []campaign.Campaign
}

func (c *Campaignepository) Save(campaign *campaign.Campaign) error {
	c.campaigns = append(c.campaigns, *campaign)
	return nil
}

func (c *Campaignepository) Get() ([]campaign.Campaign, error) {
	return c.campaigns, nil
}

func (c *Campaignepository) GetBy(id string) (*campaign.Campaign, error) {
	return nil, nil
}
