package database

import (
	"emailn/internal/domain/campaign"
	"gorm.io/driver/sqlite"
	"gorm.io/gorm"
)

func NewDb() *gorm.DB {
	db, err := gorm.Open(sqlite.Open("gorm.db"), &gorm.Config{})

	if err != nil {
		panic("failed to connect database")
	}

	db.AutoMigrate(&campaign.Campaign{}, &campaign.Contact{})
	return db
}
