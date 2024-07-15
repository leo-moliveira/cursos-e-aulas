package main

import (
	"emailn/internal/domain/campaign"
	"github.com/go-playground/validator/v10"
)

func main() {
	contacts := []campaign.Contact{{Email: ""}, {Email: "leo@leo.com.br"}}
	campaignOBJ := campaign.Campaign{Name: "222222dddddddddddddddd333333333333d222333333333333322", Contacts: contacts}
	validate := validator.New()
	err := validate.Struct(campaignOBJ)

	if err == nil {
		println("Nenhum erro")
	} else {
		validationErrors := err.(validator.ValidationErrors)

		for _, v := range validationErrors {
			message := v.StructField() + " is invalid: " + v.Tag()
			switch v.Tag() {
			case "required":
				message = v.StructField() + " is required"
				break
			case "min":
				message = v.StructField() + " is required with min " + v.Param()
				break
			case "max":
				message = v.StructField() + " is required with max " + v.Param()
				break
			case "email":
				message = v.StructField() + " is invalid"
				break
			}
			println(message)
		}
	}
}
