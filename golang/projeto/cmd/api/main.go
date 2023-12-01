package main

import (
	"emailn/internal/contract"
	"emailn/internal/domain/campaign"
	"emailn/internal/infrastructure/database"
	"emailn/internal/internalErrors"
	"errors"
	"github.com/go-chi/chi/v5"
	"github.com/go-chi/chi/v5/middleware"
	"github.com/go-chi/render"
	"net/http"
)

func main() {
	r := chi.NewRouter()

	r.Use(middleware.RequestID)
	r.Use(middleware.RealIP)
	r.Use(middleware.Logger)
	r.Use(middleware.Recoverer)

	service := campaign.Service{
		Repository: &database.CampaignRepository{},
	}

	r.Post("/campaigns", func(w http.ResponseWriter, r *http.Request) {
		var request contract.NewCampaign
		jsonErr := render.DecodeJSON(r.Body, &request)

		if jsonErr != nil {
			render.Status(r, 500)
			render.JSON(w, r, map[string]string{"error": jsonErr.Error()})
			return
		}

		id, err := service.Create(request)

		if err != nil {
			if errors.Is(err, internalErrors.ErrInternal) {
				render.Status(r, 500)
				render.JSON(w, r, map[string]string{"error": err.Error()})
				return
			}

			render.Status(r, 400)
			render.JSON(w, r, map[string]string{"error": err.Error()})
			return
		}

		render.Status(r, 201)
		render.JSON(w, r, map[string]string{"id": id})
	})

	http.ListenAndServe(":3000", r)
}
