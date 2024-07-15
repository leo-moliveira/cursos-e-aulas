package internal

import (
	"errors"
	"github.com/go-playground/validator/v10"
	"strings"
)

func ValidateStruct(obj interface{}) error {
	validate := validator.New()
	err := validate.Struct(obj)
	if err == nil {
		return nil
	}
	validationErros := err.(validator.ValidationErrors)
	validationError := validationErros[0]
	field := strings.ToLower(validationError.StructField())
	switch validationError.Tag() {
	case "required":
		return errors.New(field + " is required")
	case "email":
		return errors.New(field + " is invalid")
	case "min", "max":
		return errors.New(field + " is required with " + validationError.Tag() + " " + validationError.Param())
	default:
		return nil
	}
}
