package endpoints

import (
	"emailn/internal/contract"
	"github.com/go-chi/render"
	"net/http"
)

func (h *Handler) CampaignPost(w http.ResponseWriter, r *http.Request) (interface{}, int, error) {
	var campaign contract.NewCampaign
	render.DecodeJSON(r.Body, &campaign)

	id, err := h.CampaignService.Create(campaign)

	return map[string]string{"id": id}, 201, err
}
