package endpoints

import (
	"emailn/internal/contract"
	"emailn/internal/internalErrors"
	"errors"
	"github.com/go-chi/render"
	"net/http"
)

func (h *Handler) CampaignPost(w http.ResponseWriter, r *http.Request) {

	var request contract.NewCampaign
	jsonErr := render.DecodeJSON(r.Body, &request)

	if jsonErr != nil {
		render.Status(r, 500)
		render.JSON(w, r, map[string]string{"error": jsonErr.Error()})
		return
	}

	id, err := h.CampaignService.Create(request)

	if err != nil {
		if errors.Is(err, internalErrors.ErrInternal) {
			render.Status(r, 500)
		} else {
			render.Status(r, 400)
		}

		render.JSON(w, r, map[string]string{"error": err.Error()})
		return
	}

	render.Status(r, 201)
	render.JSON(w, r, map[string]string{"id": id})

}
