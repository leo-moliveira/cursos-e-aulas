package database

import "emailn/internal/domain/campaign"

type Campaignepository struct {
	campaigns []campaign.Campaign
}

func (c *Campaignepository) Save(campaign *campaign.Campaign) error {
	c.campaigns = append(c.campaigns, *campaign)
	return nil
}
