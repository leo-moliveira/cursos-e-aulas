package internalErrors

import (
	"errors"
	"github.com/go-playground/validator/v10"
)

func ValidateStruct(obj interface{}) error {
	valid := validator.New()
	err := valid.Struct(obj)
	if err == nil {
		return nil
	}
	validationErrors := err.(validator.ValidationErrors)
	validationError := validationErrors[0]

	switch validationError.Tag() {
	case "required":
		return errors.New(validationError.StructField() + " is required")
	case "max":
		return errors.New(validationError.StructField() + " is required with max" + validationError.Param())
	case "min":
		return errors.New(validationError.StructField() + " is required with min" + validationError.Param())
	case "email":
		return errors.New(validationError.StructField() + " is invalid ")

	}
	return nil
}
