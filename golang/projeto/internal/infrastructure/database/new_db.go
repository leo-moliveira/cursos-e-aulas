package database

import (
	"gorm.io/driver/sqlite"
	"gorm.io/gorm"
)

func NewDb() *gorm.DB {
	db, err := gorm.Open(sqlite.Open("gorm.db"), &gorm.Config{})

	if err != nil {
		panic("failed to connect database")
	}

	return db
}
