package endpoints

import (
	"emailn/internal"
	"emailn/internal/contract"
	"errors"
	"github.com/go-chi/render"
	"net/http"
)

func (h *Handler) CampaignPost(w http.ResponseWriter, r *http.Request) {
	var campaign contract.NewCampaign
	render.DecodeJSON(r.Body, &campaign)

	id, err := h.CampaignService.Create(campaign)

	if err != nil {
		status := 400
		if errors.Is(err, internal.Err) {
			status = 500
		}
		http.Error(w, err.Error(), status)
		render.JSON(w, r, map[string]string{"message": err.Error()})

		return
	}

	render.Status(r, 201)
	render.JSON(w, r, map[string]string{"id": id})
}
