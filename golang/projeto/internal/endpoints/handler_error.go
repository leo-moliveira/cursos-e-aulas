package endpoints

import (
	"emailn/internal"
	"errors"
	"github.com/go-chi/render"
	"net/http"
)

type EndpointFunc func(w http.ResponseWriter, r *http.Request) (interface{}, int, error)

func HandlerError(endpointFunc EndpointFunc) http.HandlerFunc {
	return http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
		obj, status, err := endpointFunc(w, r)

		if err != nil {
			status := 400
			if errors.Is(err, internal.Err) {
				status = 500
			}
			http.Error(w, err.Error(), status)
			render.JSON(w, r, map[string]string{"message": err.Error()})

			return
		}

		render.Status(r, status)
		if obj != nil {
			render.JSON(w, r, obj)
		}
	})
}
