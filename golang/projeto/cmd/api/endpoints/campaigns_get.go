package endpoints

import (
	"emailn/internal/internalErrors"
	"errors"
	"github.com/go-chi/render"
	"net/http"
)

func (h *Handler) CampaignGet(w http.ResponseWriter, r *http.Request) {
	campaigns, err := h.CampaignService.Repository.Get()
	if err != nil {
		if errors.Is(err, internalErrors.ErrInternal) {
			render.Status(r, 500)
		} else {
			render.Status(r, 400)
		}
		render.JSON(w, r, map[string]string{"error": err.Error()})
	}
	render.Status(r, 200)
	render.JSON(w, r, campaigns)

}
