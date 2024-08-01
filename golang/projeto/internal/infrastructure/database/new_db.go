package database

import (
	"gorm.io/driver/sqlite"
	"gorm.io/gorm"
)

func NewDB() *gorm.DB {
	db, err := gorm.Open(sqlite.Open("emailn.db"), &gorm.Config{})

	if err != nil {
		panic("failed to connect database")
	}

	return db
}
