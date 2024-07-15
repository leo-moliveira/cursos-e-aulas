package main

import (
	"emailn/internal/domain/campaign"
	"github.com/go-playground/validator/v10"
)

func main() {
	campaign := campaign.Campaign{}
	validate := validator.New()
	err := validate.Struct(campaign)
	if err == nil {
		println("Nenhum erro")
	} else {
		validateErrors := err.(validator.ValidationErrors)
		for _, value := range validateErrors {
			switch value.Tag() {
			case "required":
				println(value.StructField() + " is required ")
			case "email":
				println(value.StructField() + " is invalid ")
			case "min", "max":
				println(value.StructField() + " is invalid with " + value.Tag() + ": " + value.Param())
			default:
				println(value.StructField() + " is invalid: " + value.Tag())
			}
		}
	}
}
